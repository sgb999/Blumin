<template>
    <div class="content">
        <h1>View All Clients</h1>
            <div v-if="client"
                 v-for="client in clients">
                <p>{{ client.name }}</p>
                <p>{{ client.email }}</p>
                <p>{{ client.post_code }}<p>
                <p>{{ client.contact_number }}</p>
                <a :href="'/manage-client/' + client.id">
                    <button>Manage Client</button>
                </a>
                <a :href="'/view-client/' + client.id">
                    <button>View Client</button>
                </a>
                <hr>
            </div>
        <button v-on:click="getClientData">Load More</button>
    </div>
</template>

<script>
var array = [];
export default {
    name: "viewClients",
    data: function() {
        return {
            id: 0,
            clients: []
        }
    },
    methods: {
    getClientData(){
        fetch('/view-clients/' + this.id).then((response) => response.text())
            .then((data) => {
                this.clients = JSON.parse(data);
                this.id = this.clients[this.clients.length - 1].id;
            }).catch((error) => {
            console.log('Error: ' + error);
        });
    }
    },
    mounted() {
        this.getClientData();
    }
};
</script>
