import { http } from "./config";

export default {

    list:() => {
        return http.get('recipe')
    },

    get:(id) => {
        return http.get('recipe/'+id)
    },

    save:(json) =>{
        return http.post('recipe', json)
    },

    update:(id, json)=>{
        return http.put('recipe/'+id, json)
    },

    delete:(id) => {
        return http.delete('recipe/'+id)
    }

}