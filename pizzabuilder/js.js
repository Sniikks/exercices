import React, {useState, useEffect, useContext, ReactNode, createContext, Dispatch, SetStateAction, KeyboardEvent} from "https://cdn.skypack.dev/react";
import ReactDOM from "https://cdn.skypack.dev/react-dom";
import {
  BrowserRouter,
  Routes,
  Route,
  useNavigate
} from "https://cdn.skypack.dev/react-router-dom";

/* Global Types */

type DiscountCode = {
  [key: string]: number
}

type Size = {
  [key: string]: {
    basePrice: number,
    inches: number
  }
}

type Topping = {
  icons: string[],
  amount: number
}

/* Pizza Context/Provider */

type PizzaContextType = {
  sizeOptions: Size,
  selectedSize: string,
  setSelectedSize: Dispatch<SetStateAction<string>>
  toppingPrice: number,
  toppingOptions: { [key: string]: Topping },
  selectedToppings: string[],
  setSelectedToppings: Dispatch<SetStateAction<string[]>>,
  discountCodes: DiscountCode,
  discountCode: string,
  setDiscountCode: Dispatch<SetStateAction<string>>,
  discountApplied: boolean,
  setDiscountApplied: Dispatch<SetStateAction<boolean>>,
  totalPrice: number,
  orderConfirmed: boolean,
  setOrderConfirmed: Dispatch<SetStateAction<boolean>>
}

type PizzaProviderProps = {
  children: ReactNode
}

const PizzaContext = createContext({} as PizzaContextType)

const PizzaProvider = ({ children }: PizzaProviderProps) => {
  const [selectedSize, setSelectedSize] = useState('large')
  const [selectedToppings, setSelectedToppings] = useState<string[]>([])
  const [discountCode, setDiscountCode] = useState('')
  const [orderConfirmed, setOrderConfirmed] = useState(false)
  const [discountApplied, setDiscountApplied] = useState(false)

  const sizeOptions: Size = {
    small: {
      basePrice: 800,
      inches: 9.5
    },
    medium: {
      basePrice: 1000,
      inches: 11.5
    },
    large: {
      basePrice: 1200,
      inches: 13.5
    }
  }

  const toppingOptions: { [key: string]: Topping } = {
    pepperoni: {
      icons: ['gluten free'],
      amount: 12
    },
    bacon: {
      icons: ['gluten free'],
      amount: 13
    },
    ham: {
      icons: ['gluten free'],
      amount: 14
    },
    sausage: {
      icons: [],
      amount: 13
    },
    chicken: {
      icons: ['gluten free'],
      amount: 14
    },
    onions: {
      icons: ['vegetarian', 'gluten free'],
      amount: 15
    },
    peppers: {
      icons: ['vegetarian', 'gluten free'],
      amount: 15
    },
    mushrooms: {
      icons: ['vegetarian', 'gluten free'],
      amount: 22
    },
    pineapple: {
      icons: ['vegetarian', 'gluten free'],
      amount: 16
    },
    olives: {
      icons: ['vegetarian', 'gluten free'],
      amount: 19
    },
    jalapenos: {
      icons: ['vegetarian', 'gluten free', 'hot'],
      amount: 19
    }
  }

  const discountCodes: DiscountCode = {
    codepen: 25,
    css: 20,
    george: 30,
    html: 10,
    javascript: 15,
    pizza: 40,
    react: 35,
    typescript: 5
  }

  const toppingPrice = 150

  const totalPrice = parseFloat(((sizeOptions[selectedSize].basePrice + (toppingPrice * selectedToppings.length)) / 100).toFixed(2))

  return (
    <PizzaContext.Provider
      value={
        {
          sizeOptions,
          selectedSize,
          setSelectedSize,
          toppingPrice,
          toppingOptions,
          selectedToppings,
          setSelectedToppings,
          discountCodes,
          discountCode,
          setDiscountCode,
          discountApplied,
          setDiscountApplied,
          totalPrice,
          orderConfirmed,
          setOrderConfirmed
        }
      }
    >
      {children}
    </PizzaContext.Provider>
  )
}

/* Layout */

type LayoutProps = {
  page: string,
  children: ReactNode
}

const Layout = ({ page, children }: LayoutProps) => {
  return (
    <div className={`container ${page}`}>
      {children}
    </div>
  )
}

/* Header */

const Header = () => {
  return (
    <header>
      <h1><span aria-hidden>🍕</span>Pizza Builder<span aria-hidden>🍕</span></h1>
    </header>
  )
}

/* Topping Icon */

type ToppingIconProps = {
  iconType: string
}

function ToppingIcon({ iconType }: ToppingIconProps) {
  return (
    <span className={`pizza-options__topping-icon pizza-options__topping-icon--${iconType.split(' ')[0]}`} aria-hidden='true'>
      {iconType.charAt(0).toUpperCase()}
    </span>
  )
}

/* Topping Option */

type ToppingOptionProps = {
  topping: string,
  toppingIcons: string[]
}

const ToppingOption = ({ topping, toppingIcons }: ToppingOptionProps) => {
  const { selectedToppings, setSelectedToppings } = useContext(PizzaContext)

  const handleToppingOptionClick = (selectedTopping: string) => {
    if (selectedToppings.includes(selectedTopping)) {
      // Remove topping
      setSelectedToppings(prevSelectedToppings => prevSelectedToppings.filter(topping => topping !== selectedTopping))
    } else {
      // Add topping
      setSelectedToppings(prevSelectedToppings => [...prevSelectedToppings, selectedTopping])
    }
  }

  return (
    <li className='pizza-options__topping'>
      <input
        type='checkbox'
        id={topping}
        className='pizza-options__topping-input'
        checked={selectedToppings.includes(topping)}
        onChange={e => handleToppingOptionClick(e.target.id)}
      />
      <label className='pizza-options__topping-label' htmlFor={topping} aria-label={`${topping} (${toppingIcons.map(icon => icon)})`}>
        <div className='pizza-options__topping-image'>
          <div className={`${topping} topping-image-item`}></div>
        </div>
        <span className='pizza-options__topping-label-content'>
          <span className='pizza-options__topping-label-text'>
            {topping}
          </span>
          <span className='pizza-options__topping-label-icons'>
            {
              toppingIcons.map(icon =>
                <ToppingIcon key={`${topping} ${icon}`} iconType={icon} />
              )
            }
          </span>
        </span>
      </label>
    </li>
  )
}

/* Order Selection */

const PizzaOptions = () => {
  const {
    sizeOptions,
    selectedSize,
    setSelectedSize,
    toppingPrice,
    toppingOptions
  } = useContext(PizzaContext)

  return (
    <section className='pizza-options panel' aria-label='pizza options'>
      <h2>Options</h2>
      <h3>Size</h3>
      <div className='pizza-options__size'>
        <select
          className='pizza-options__size-input'
          aria-label='pizza size'
          value={selectedSize}
          onChange={e => setSelectedSize(e.target.value)}
        >
          {
            Object.keys(sizeOptions).map(size =>
              <option key={size} value={size}>{`${size} (${sizeOptions[size].inches}")`}</option>
            )
          }
        </select>
        <svg className='pizza-options__size-icon' viewBox='0 0 20 20' fill='none' aria-hidden='true'>
          <path stroke='#0e447a' strokeLinecap='round' strokeLinejoin='round' strokeWidth='2' d='M4 7l6 6 6-6'></path>
        </svg>
      </div>
      <h3>Toppings</h3>
      <ul className='pizza-options__details'>
        <li><ToppingIcon iconType={'vegetarian'} /> Vegetarian</li>
        <li><ToppingIcon iconType={'gluten free'} /> Gluten Free</li>
        <li><ToppingIcon iconType={'hot'} /> Hot & Spicy</li>
      </ul>
      <p className='pizza-options__details'>Toppings charged at ${(toppingPrice / 100).toFixed(2)} each.</p>
      <ul className='pizza-options__toppings'>
        {
          Object.entries(toppingOptions).map(topping =>
            <ToppingOption key={topping[0]} topping={topping[0]} toppingIcons={topping[1].icons} />
          )
        }
      </ul>
    </section>
  )
}

/* Pizza Topping */

type PizzaToppingProps = {
  topping: string,
  toppingAmount: number
}

const PizzaTopping = ({ topping, toppingAmount }: PizzaToppingProps) => {
  let toppings = []

  for (let i = 1; i <= toppingAmount; i++) {
    toppings.push(<div key={`${topping + i}`} className={`topping ${topping} ${topping}-${i} `} ></div>)
  }

  return <>{[...toppings]}</>
}

/* Pizza */

const Pizza = () => {
  const { selectedSize, toppingOptions, selectedToppings } = useContext(PizzaContext)

  return (
    <div className='pizza panel'>
      <div className={`pizza__pie pizza__pie--${selectedSize}`}>
        {
          selectedToppings.map(topping =>
            <PizzaTopping key={topping} topping={topping} toppingAmount={toppingOptions[topping].amount} />
          )
        }
      </div>
    </div>
  )
}

/* Order Details */

const OrderDetails = () => {
  const {
    sizeOptions,
    selectedSize,
    selectedToppings,
    discountCodes,
    discountCode,
    setDiscountCode,
    discountApplied,
    setDiscountApplied,
    totalPrice,
    orderConfirmed,
    setOrderConfirmed
  } = useContext(PizzaContext)

  const navigate = useNavigate()

  const discountValid = Object.keys(discountCodes).includes(discountCode)

  const handleDiscountInput = (value: string) => {
    setDiscountCode(value.trim().toLowerCase())

    if (discountApplied) {
      setDiscountApplied(false)
    }
  }

  const handleDiscountEnter = (e: KeyboardEvent<HTMLInputElement>) => {
    if (e.key === "Enter") {
      setDiscountApplied(true)
    }
  }

  const handleOrderConfirm = () => {
    setOrderConfirmed(true)

    navigate('/confirmation')
  }

  return (
    <section className='order-details panel' aria-label='order details'>
      <h2>Order Details</h2>
      <div className='order-details__size'>
        <h3>Size</h3>
        <p className='order-details__size-value'>
          {`${selectedSize} (${sizeOptions[selectedSize].inches}")`}
        </p>
      </div>
      <div className='order-details__toppings'>
        <h3>Toppings</h3>
        <ul className='order-details__toppings-list'>
          <li className='order-details__toppings-item'>Cheese</li>
          {
            selectedToppings.map(topping =>
              <li key={topping} className='order-details__toppings-item'>{topping}</li>
            )
          }
        </ul>
      </div>
      <div className='order-details__discount'>
        {orderConfirmed ? (
          discountValid && (
            <>
              <h3>Discount Code</h3>
              <p className='order-details__discount-details'>
                <span>{discountCode.toUpperCase()}</span> - {discountCodes[discountCode]}% Off
              </p>
            </>
          )
        ) : (
          <>
            <h3>Discount Code</h3>
            <input
              type='text'
              className='order-details__discount-input'
              spellCheck='false'
              value={discountCode}
              maxLength={10}
              aria-label='Discount Code'
              aria-describedby='discount-message'
              aria-invalid={discountApplied && !discountValid}
              onChange={e => handleDiscountInput(e.target.value)}
              onKeyUp={e => handleDiscountEnter(e)}
            />
            {
              discountApplied ?
                discountValid ?
                  <p id='discount-message' className='order-details__discount-message order-details__discount-message--valid' role='alert'>
                    Valid Code: {discountCodes[discountCode]}% Off
                  </p>
                  :
                  <p id='discount-message' className='order-details__discount-message order-details__discount-message--invalid' role='alert'>
                    Invalid Code
                  </p>
                : null
            }
            {
              !discountApplied && (
                <button className='btn order-details__discount-apply' onClick={() => setDiscountApplied(true)} aria-label='Apply Discount'>Apply</button>
              )
            }
          </>
        )
        }
      </div>
      <div className='order-details__price'>
        <h3>Total Price</h3>
        <p className='order-details__price-value'>
          {
            discountApplied && discountValid ?
              (
                <>
                  <ins>${(totalPrice - (totalPrice * (discountCodes[discountCode] / 100))).toFixed(2)}</ins>
                  <del>${totalPrice.toFixed(2)}</del>
                </>
              )
              : `$${totalPrice.toFixed(2)}`
          }
        </p>
        {
          !orderConfirmed && (
            <button
              className='btn order-details__order'
              aria-label='confirm order'
              onClick={handleOrderConfirm}
            >
              Order
            </button>
          )
        }
      </div>
    </section>
  )
}

/* Order Confirmation */

const OrderConfirmation = () => {
  return (
    <section className='order-confirmation panel'>
      <svg className='order-confirmation__icon' viewBox='-1 0 19 19'>
        <path d='M16.417 9.579A7.917 7.917 0 1 1 8.5 1.662a7.917 7.917 0 0 1 7.917 7.917zm-4.165-4.6a10.965 10.965 0 0 0-7.662-.004.396.396 0 1 0 .275.742 10.173 10.173 0 0 1 7.11.003.396.396 0 1 0 .277-.741zm-.435 1.48s-.23-.09-.498-.175a9.597 9.597 0 0 0-5.697-.034c-.3.09-.596.205-.596.205a.308.308 0 0 0-.175.407l3.444 8.327c.067.16.175.16.242 0l3.453-8.323a.31.31 0 0 0-.173-.408zM6.875 8.662a1.026 1.026 0 1 0-1.026-1.026 1.026 1.026 0 0 0 1.026 1.026zm1.546 3.852a1.026 1.026 0 1 0-1.026-1.025 1.026 1.026 0 0 0 1.026 1.025zm1.16-2.747a1.026 1.026 0 1 0-1.026-1.026A1.026 1.026 0 0 0 9.58 9.768z' />
      </svg>
      <h2>Order Confirmed</h2>
      <p>Your pizza will be ready shortly!</p>
    </section>
  )
}

/* Builder */

const Builder = () => {
  const { orderConfirmed, setOrderConfirmed } = useContext(PizzaContext)

  useEffect(() => {
    if (orderConfirmed) {
      setOrderConfirmed(false)
    } else {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  }, [])

  return (
    <Layout page='build'>
      <PizzaOptions />
      <Pizza />
      <OrderDetails />
    </Layout >
  )
}

/* Confirmation */

const Confirmation = () => {
  const { orderConfirmed } = useContext(PizzaContext)

  const navigate = useNavigate()

  useEffect(() => {
    if (!orderConfirmed) {
      navigate('/')
    } else {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  }, [])

  return (
    <Layout page='confirmation'>
      <OrderConfirmation />
      <OrderDetails />
      <Pizza />
    </Layout>
  )
}

/* Pizza Builder */

const PizzaBuilder = () => {
  return (
    <>
      <Header />
      <main>
        <PizzaProvider>
          <BrowserRouter>
            <Routes>
              <Route path='/' element={<Builder />} />
              <Route path='*' element={<Builder />} />
              <Route path='/confirmation' element={<Confirmation />} />
            </Routes>
          </BrowserRouter>
        </PizzaProvider>
      </main>
    </>
  )
}

ReactDOM.render(<PizzaBuilder />, document.querySelector('#pizza-builder'));