export default
{
    get($key)
    {
        return new Promise((resolve, reject) => {
            axios.get("/url/" + $key)
                .then(response => resolve(response.data))
                .catch(reason => reject(reason));
        });
    }
}
