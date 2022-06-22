<template>
    <div>

        <form @submit.prevent="getData(url + '/users')" class="row g-3 mb-3">
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="category" id="category" v-model="filters.category">
                    <option value="" selected>Select a category</option>
                    <option v-for="category in metadata.categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                </select>
            </div>
        </form>

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
            url: 'http://aletucci.dynv6.net:9000/api/v1',
            users: [],
            metadata: {},
            filters: {
                category: '',
            },
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
        this.GetData(this.url + '/users?home');
        Axios.get(this.url + '/metadata')
            .then(response => {
                this.metadata = response.data;
                console.log(response.data)

            });
    }
}
</script>

<style lang="scss" scoped>

</style>