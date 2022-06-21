<template>
    <div>

        <div class="categories-buttons">
            <button></button>
        </div>

        <div class="cards-cont" v-for="user in users" :key="user.id">
            <div class="card">
                <h1>
                    {{  user.name  }}
                </h1>

                <p>
                    {{  user.street  }} - {{  user.city  }}
                </p>
                <p>
                    Phone: {{  user.phone_number  }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PageHome',
    data() {
        return {
            url: 'http://aletucci.dynv6.net:9000/api/v1/users',
            users: [],
        }
    },
    methods: {
        GetData(url) {
            Axios.get(url).then(response => {
                console.log(response.data.response)

                this.users = response.data.response.data
            })
        }
    },
    created() {
        this.GetData(this.url)
    }
}
</script>

<style lang="scss" scoped>

</style>