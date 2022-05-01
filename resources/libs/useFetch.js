import axios from "axios";

export async function useFetch(url, loading, options) {
    let status = null;
    let response = null;
    let data = null;

    try {

        const crftoken = document.querySelector('meta[name="csrf-token"]').content;
        
        response = await axios.request({
            headers: {
                "X-CSRF-TOKEN": crftoken,
            },
            url: `/api/${url}`,
            ...options,
        });

        ({ data, status } = response);
    } catch (error) {
        console.log(error);
    } finally {
        loading.value = false;
    }

    return {
        data,
        status,
        response,
    };
}