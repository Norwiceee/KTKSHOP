<template>
    <div class="app">

        <nav class="navbar nav-info navbar-expand p-0">
            <div class="d-flex justify-content-center w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link to="#" class="nav-link">Доставка и оплата</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="#" class="nav-link">О компании</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="#" class="nav-link">Отызвы клиентов</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="#" class="nav-link">Как сделать заказ?</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="#" class="nav-link">Промокоды</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="#" class="nav-link">Контакты</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="#" class="nav-link">Корпоративным клиентам</router-link>
                    </li>
                </ul>
            </div>
        </nav>

        <nav class="navbar nav-bg navbar-expand p-4 navbar-light bg-light bg-img">
            <div class="container-xxl" style="z-index: 3">

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <h1><router-link to="/" class="nav-link">KTKSHOP</router-link></h1>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto me-auto">
                    <li class="nav-item d-flex text-minor">
                        <h2 class="d-flex align-items-center mb-0"><i class="fas fa-phone"></i></h2>
                        <div>
                            <h4 class="m-0 pb-0">
                                <a href="tel:+79999999999" class="nav-link link-minor pb-0">
                                    +7 (999) 999-99-99
                                </a>
                            </h4>
                            <div class="ps-2">
                                9:00-21:00 Каждый день
                            </div>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto me-auto">
                    <li class="nav-item">
                        <div @click="openModal" class="nav-link cursor-pointer text-minor">
                            <h4>
                                Перезвоните мне
                            </h4>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item me-2">
                        <router-link to="/wishlist" class="cart-img text-minor m-0 d-flex align-items-center btn btn-main ">
                            <h4 class="m-0">
                                <i class="fas fa-heart"></i>
                            </h4>
                        </router-link>
                    </li>

                    <li class="nav-item" style="position: relative;">
                        <div class="d-flex justify-content-center align-items-center notification-circle">{{ totalCount }}</div>
                        <router-link to="/cart" class="cart-img btn btn-main text-minor d-flex align-items-center">
                            <h4 class="mb-0 me-2">
                                <i class="fas fa-shopping-cart"></i>
                            </h4>
                        </router-link>
                    </li>

                </ul>
            </div>
        </nav>

        <nav class="navbar nav-header navbar-expand-lg navbar-main bg-main">
            <div class="container-xxl">

                <router-link class="navbar-brand" to="/">Магазин</router-link>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link to="/" class="nav-link">Главная</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/products" class="nav-link">Каталог</router-link>
                        </li>
                    </ul>

                    <!--                    <div class="search w-100 h-100 d-flex justify-content-center">-->
                    <!--                        <div class="search-form">-->
                    <!--                            <input @keyup.enter="startSearch(searchInputValue)"-->
                    <!--                                   @input="suggestSearch($event)"-->
                    <!--                                   :value="searchInputValue"-->
                    <!--                                   id="search-input"-->
                    <!--                                   class="search-input"-->
                    <!--                                   placeholder="поиск"-->
                    <!--                                   autocomplete="off"-->
                    <!--                            >-->
                    <!--                            <i @click="startSearch(searchInputValue)" class="fa fa-search search-icon cursor-pointer"></i>-->
                    <!--                            <div class="search-list">-->

                    <!--                                <span-->
                    <!--                                v-show="search.searchLast.text.length !== 0"-->
                    <!--                                class="search-delete-history cursor-pointer"-->
                    <!--                                @click="deleteAllHistory"-->
                    <!--                                >Очистить историю поиска</span>-->

                    <!--                                <div class="last-search">-->
                    <!--                                    <div-->
                    <!--                                        v-for="(search, index) in search.searchLast.text"-->
                    <!--                                        v-show="this.search.searchLast.text.length !== 0"-->
                    <!--                                    >-->
                    <!--                                        <div v-show="index+1 <= 5" class="search-list-item cursor-pointer">-->

                    <!--                                            <span @click="startSearch(search)" class="search-list-item-text w-100">-->
                    <!--                                                <i class="fas fa-history"></i> {{ search }}-->
                    <!--                                            </span>-->

                    <!--                                            <span class="search-delete-history-one">-->
                    <!--                                                <i @click="deleteHistoryOne(index)" class="fas fa-times "></i>-->
                    <!--                                            </span>-->

                    <!--                                        </div>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->

                    <!--                                <div class="popular-search">-->
                    <!--                                    <div-->
                    <!--                                        v-for="(search, index) in search.searchPopular.text"-->
                    <!--                                        v-if="this.search.searchPopular.text.length !== 0"-->
                    <!--                                    >-->
                    <!--                                        <div @click="startSearch(search)" v-if="index < 5 || index < (10 - this.search.searchLast.text.length)" class="search-list-item cursor-pointer">-->
                    <!--                                            <span class="search-list-item-text">-->
                    <!--                                            <i class="fa fa-search"></i> {{ search }}-->
                    <!--                                            </span>-->
                    <!--                                        </div>-->

                    <!--                                    </div>-->
                    <!--                                </div>-->

                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->


                    <search
                        v-model:searchInputValue="searchInputValue"
                        v-model:searchValue="searchValue"
                        @updateSearchInputValue="updateSearchInputValue"
                        @startSearch="startSearch"
                    />

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li v-show="authenticated" class="nav-item">
                            <router-link to="/profile" class="nav-link text-nowrap">Личный кабинет <i class="fas fa-user" style="color: #000"></i></router-link>
                        </li>
                        <li v-show="!authenticated" class="nav-item">
                            <router-link to="/user/login" class="nav-link text-nowrap">Войти <i class="fas fa-user" style="color: #000"></i></router-link>
                        </li>
                        <li v-show="!authenticated" class="nav-item">
                            <router-link to="/user/registration" class="nav-link text-nowrap">Регистрация</router-link>
                        </li>
                        <li v-show="authenticated" class="nav-item">
                            <a href="#" @click.prevent="logout()" class="nav-link text-nowrap">Выйти</a>
                        </li>
                    </ul>

                </div>
            </div>

        </nav>

        <modal-call-me-later
            class="modal-window"
            v-model:callMeLater="modalVisibility.callMeLater"
        />

        <router-view
            class="content-on-page mb-5"
            v-model:searchValue="searchValue"
            @deleteCurrentSearchValue="deleteCurrentSearchValue"
        />

        <footer class="static-footer d-flex justify-content-center align-items-center flex-column py-5">
            <div class="">Никита Бульба, г. Казань, 2025г.</div>
        </footer>
    </div>
</template>

<script>

import { mapActions } from 'vuex'
import ModalCallMeLater from "@/components/modals/ModalCallMeLater.vue";
import Search from "./components/filters/search.vue";
import hideScrollMixin from "@/mixins/hideScrollMixin.vue";

export default {
    name: 'App',

    components: {
        Search,
        ModalCallMeLater,
    },

    mixins: [hideScrollMixin],

    data() {
        return {
            modalVisibility: {
                callMeLater: false,
            },
            search: {
                searchLast: {
                    text: ['keee', 'kee', 'kekeke', 'delat ke', 'ilia ke']
                },
                searchPopular: {
                    text: ['keee', 'kee', 'kekeke', 'delat ke', 'ilia ke', 'keee', 'kee', 'kekeke', 'delat ke', 'ilia ke']
                }
            },
            searchInputValue: '',
            searchValue: '',
        }
    },

    computed: {
        user: function () {
            return this.$store.state.auth.user
        },
        authenticated: function () {
            return this.$store.state.auth.authenticated
        },
        productsInCart: function () {
            return this.$store.state.cartProducts.products
        },
        wishlist: function () {
            return this.$store.state.auth.wishlist
        },
        lastSearches: function () {
            return this.$store.state.lastSearch.searches
        },

        totalPrice: function () {
            let total = 0
            if (this.productsInCart && Object.keys(this.productsInCart).length > 0) {
                this.productsInCart.forEach(productInCart => {
                    total += Number(productInCart.price) * Number(productInCart.qty)
                })
            }
            return total
        },

        totalCount: function () {
            let total = 0
            if (this.productsInCart && Object.keys(this.productsInCart).length > 0) {
                this.productsInCart.forEach(productInCart => {
                    total += Number(productInCart.qty)
                })
            }
            return total
        },
    },

    mounted() {
        if (this.authenticated) {
            this.getWishlist()
        }
    },

    // renderTriggered({ key, target, type }) {
    //     console.log({ key, target, type })
    // },

    methods: {
        ...mapActions({
            signOut:"auth/logout",
            setWishlist:"auth/setWishlist",
            addItemToLastSearch:"lastSearch/addItemToLastSearch",
            removeItemFromLastSearch:"lastSearch/removeItemFromLastSearch",
            setLastSearch:"lastSearch/setLastSearch",
        }),

        updateSearchInputValue(value) {
            this.searchInputValue = value
        },

        suggestSearch(event) {
            this.searchInputValue = event.target.value
        },

        deleteCurrentSearchValue() {
            this.searchInputValue = ''
            this.searchValue = ''
        },

        startSearch(search) {

            this.searchValue = search

            // this.search.searchLast.text.forEach((item, i) => {
            //     if (item === search) {
            //         this.search.searchLast.text.splice(i, 1)
            //     }
            // })
            // this.search.searchLast.text.unshift(search);
        },

        deleteAllHistory() {
            document.getElementById('search-input').focus()
            this.search.searchLast.text.splice(0, this.search.searchLast.text.length)
        },

        deleteHistoryOne(index) {
            document.getElementById('search-input').focus()
            this.search.searchLast.text.splice(index, 1)
        },

        openModal() {
            this.modalVisibility.callMeLater = true
            this.hideScroll()
        },

        hideModal() {
            this.modalVisibility.callMeLater = false
            this.addScroll()
        },

        async logout(){
            await axios.post('/logout').then(({data})=>{
                this.signOut()
                this.$router.push({name:"user.login"})
            })
        },

        async getWishlist() {
            await this.setWishlist()
        },

        setProductsInCart(productsInCart) {
             localStorage.setItem('cart', JSON.stringify(productsInCart))
        },
    }
}
</script>

<style>

</style>
