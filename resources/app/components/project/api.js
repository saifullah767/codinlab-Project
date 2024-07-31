import api from "../../api"

export const createProject = (data) => {
    return api.post( `/create-project`, data );
}

export const createComment = (data) => {
    return api.post( `/create-comment`, data );
}