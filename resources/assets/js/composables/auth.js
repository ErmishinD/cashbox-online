import {ref, reactive} from 'vue'
import {useRouter} from "vue-router";

const user = reactive({
    name: '',
    email: '',
})

export default function useAuth() {
    const processing = ref(false)
    const validationErrors = ref({})
    const router = useRouter()

    const loginForm = reactive({
        email: '',
        password: '',
        remember: false
    })

    const submitLogin = async () => {
        if (processing.value) return

        processing.value = true
        validationErrors.value = {}

        axios.post('/login', loginForm)
            .then(async response => {
                await loginUser(response)
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => processing.value = false)
    }

    const loginUser = async (response) => {
        user.name = response.data.name
        user.email = response.data.email
        localStorage.setItem('loggedIn', JSON.stringify(true))
        await router.push({name: 'home'})
    }

    const getUser = async () => {
        axios.get('/api/user')
            .then(response => {
                loginUser(response)
            })
    }

    const logout = async () => {
        if (processing.value) return

        processing.value = true

        axios.post('/logout')
            .then(response => router.push({name: 'login'}))
            .catch(error => {
                console.log(error)
            })
            .finally(() => {
                processing.value = false
            })
    }

    return {
        loginForm,
        validationErrors,
        processing,
        submitLogin,
        user,
        getUser,
        logout,
    }
}
