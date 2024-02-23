<template>
    <Transition @after-enter="AfterEnter()" @after-leave="AfterLeave()">
        <section id="JasonD">
            <button>Ok Meque</button>
            <div>
                <router-link class="Button" to="/profil">Profil</router-link>
                <button>Paramètres</button>
                <button>Mode Nuit</button>
                <button>Déconnexion</button>
            </div>
        </section>
    </Transition>
</template>

<script>
export default {
    name: "JasonDeroulante",
    methods: {
        AfterEnter() {
            document.getElementById("JasonD").style.right = 0;
        },
        AfterLeave() {
            document.getElementById("JasonD").style.right = "-20%";
        }
    }
}
</script>

<style scoped lang="scss">
section {   
    box-sizing: border-box;
    background-color: #193784;
    position:absolute;
    top: 131px;
    right: -20%;
    z-index: 10;
    width: 400px;
    height: 460px;
    padding: 25px;
    display: flex;
    align-items: center;
    flex-direction: column;
    border-bottom-left-radius: 25px;
    button, .Button {
        &:last-child {
            margin-top: 60px;
        }
        background-color: aliceblue;
        cursor: pointer;
        font-size: 1.1em;
        padding: 0;
        padding: 15px 35px;
        border-radius: 25px;
        border: none;
        width: 70%;
        margin-top: 25px;
        text-align: center;
    }
    div {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: baseline;
        button, .Button {
            width: 50% !important;
        }
    }  
}
.v-enter-active,
.v-leave-active {
  transition: right 2s ease;
}

.v-leave-from,
.v-enter-to {
    right: 0 !important;
}

.v-enter-from,
.v-leave-to {
  right: -20% !important;
}
</style>