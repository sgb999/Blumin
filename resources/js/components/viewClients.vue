<template>
    <div class="content">
        <h1>View All Clients</h1>
        <table class="table">
            <tr>
                <th scope="col">Client Name</th>
                <th scope="col">Client E-mail Address</th>
                <th scope="col">Client Post Code</th>
                <th scope="col">Client Contact Number</th>
                <th scope="col">Actions</th>
            </tr>
            <tbody>
                <tr v-if="clients"
                    v-for="client in clients">
                    <th scope="row">{{ client.name}}</th>
                    <td>{{ client.email }}</td>
                    <td>{{ client.post_code }}</td>
                    <td>{{ client.contact_number }}</td>
                    <td><a class="btn btn-primary" :href="'/manage-client/' + client.id">Manage Client</a></td>
                    <td><a class="btn btn-primary" :href="'/view-client/' + client.id">View Client</a></td>
                </tr>
            </tbody>
        </table>
        <div class="table-pages">
            <button v-if="clients" class="btn btn-primary" v-on:click="getClientData">Load More</button>
        </div>
    </div>
</template>

<script>
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
                if(this.clients.length > 1){
                    for(let i =0; i < JSON.parse(data).length; i++){
                        this.clients.push(JSON.parse(data)[i]);
                    }
                }
                else{
                    this.clients = JSON.parse(data);
                }
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
