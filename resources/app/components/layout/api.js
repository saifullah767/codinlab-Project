import api from "../../api";

export const logoutPage = () => {
    return api.get('/logout');
}