import api from "../../api"

export const createUser = (data) => {
    return api.post( `/create-user`, data );
}