import { SIGNUP_ACTION } from "@/store/storeconstants";
import Axios from 'axios';


//gagawin dito is about sa token katulad ng ginawa ni pana
//firebase muna database nito

export default {
    async [SIGNUP_ACTION](_, payload) {
        let postData = {
            email: payload.email,
            password: payload.password,
            returnSecureToken: true,
        }
        let response = await Axios.post(
            'https://identitytoolkit.googleapis.com/v1/accounts:signUp?key=AIzaSyA0uV6cs1uoWb2kE4W84JdHW8eslQJacA8'
        , 
        postData,
        );
        console.log(response)
    },
};

