<template>
    <div>
        <header>
            <h1>Mon Site Alouette</h1>
            <button @click="showDropdown = !showDropdown">Ok Meque</button>
        </header>
        <nav>
            <ul>
                <li>Pulls</li>
                <li>Pantalons</li>
                <li>T-shirts</li>
                <li>Pyjamas</li>
                <li>Parkas</li>
                <li>Veste</li>
                <li>Cramptés</li>
            </ul>   
        </nav>
        <JasonDeroulante v-show="showDropdown"/>
    </div>
</template>

<script>
import JasonDeroulante from './JasonDeroulante.vue';

export default {
    name: 'HeaderComponent',
    data() {
        return {
            showDropdown: false     
        }
    },
    components: {
        JasonDeroulante
    }
}
</script>

<style scoped lang="scss">

header {
    width: 100%;
    height: 130px;
    background-color: #193784;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 55px;
    box-sizing: border-box;
    h1, button, .Button {
        margin: 0;
        padding: 15px 30px;
        background-color: aliceblue;
        border-radius: 15px;
        border: none;
        cursor: pointer;
    }
    h1 {
        font-size: 1.4em;
    }
    button {
        font-size: 1.1em;
    }
} 
nav {
    background-color: rgba(25, 55, 132, 0.8);
    width: 100%;
    height: 70px;
    display: flex;
    align-items: center;
    ul {
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        list-style-type: none;
        width: 45%;
        color: white;
        font-size: 1.2em;
    }
}

</style>