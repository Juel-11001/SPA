import {computed, isRef} from "vue";

export const useMonthlyPayment = (total, interestRate, duration) => {
    const monthlyPayment = computed(() => {
        const principle = isRef(total) ? total.value : total
        const monthlyInterest = (isRef(interestRate.value) ? interestRate.value : interestRate.value) / 100 / 12
        const numberOfPaymentMoths =(isRef(duration) ? duration.value : duration) * 12
        return principle * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPaymentMoths)) / (Math.pow(1 + monthlyInterest, numberOfPaymentMoths) - 1)
    })
    return {monthlyPayment}
}
