/*=========================================================================================
  File Name: moduleCalendarMutations.js
  Description: Calendar Module Mutations
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


export default {
    ADD_ITEM(state, item) {
        state.drivers.unshift(item)
    },
    SET_DRIVERS(state, drivers) {
        state.drivers = drivers
    },
    // SET_LABELS(state, labels) {
    //   state.eventLabels = labels
    // },
    UPDATE_PRODUCT(state, driver) {
        const productIndex = state.drivers.findIndex((p) => p.id == driver.id)
        Object.assign(state.products[productIndex], driver)
    },
    REMOVE_ITEM(state, itemId) {
        const ItemIndex = state.products.findIndex((p) => p.id == itemId)
        state.products.splice(ItemIndex, 1)
    },
}
