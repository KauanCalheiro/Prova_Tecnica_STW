import { http } from "./config";

export default {

    list: () => {
        return http.get('ingredient')
    },

    save: (id, description, kg) => {
        return http.post('ingredient', {
            'id': id,
            'description': description,
            'predicted_in_kg': kg
        })
    },

    put:(id ,json) => {
        return http.put('ingredient/' + id, json)
    },

    delete: (id) => {
        return http.delete('ingredient/' + id)
    }
}