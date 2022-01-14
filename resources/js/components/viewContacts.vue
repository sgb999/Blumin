<template>
    <div class="content">
        <h1>View All Contacts</h1>
        <table class="table">
            <tr>
                <th scope="col">Contact Name</th>
                <th scope="col">Contact E-mail Address</th>
                <th scope="col">Contact Job Role</th>
                <th scope="col">Contact Phone Number</th>
                <th scope="col">Actions</th>
            </tr>
            <tbody>
            <tr v-if="contacts"
                v-for="contact in contacts">
                <th scope="row">{{ contact.user.name}}</th>
                <td>{{ contact.user.email }}</td>
                <td>{{ contact.job_role }}</td>
                <td>{{ contact.phone_number }}</td>
                <td><a class="btn btn-primary" :href="'/manage-contact/' + contact.id">Manage contact</a></td>
                <td><a class="btn btn-primary" :href="'/view-contact/' + contact.id">View contact</a></td>
            </tr>
            </tbody>
        </table>
        <div class="table-pages">
            <button class="btn btn-primary" v-on:click="getContactData">Load More</button>
        </div>
    </div>
</template>

<script>

export default {
    name: "viewContacts",
    data: function() {
        return {
            id: 0,
            contacts: []
        }
    },
    methods: {
        getContactData() {
            fetch('/view-contacts/' + this.id).then((response) => response.text())
            .then((data) => {
                for(let i =0; i < JSON.parse(data).length; i++){
                    this.contacts.push(JSON.parse(data)[i]);
                }
                this.id = this.contacts[this.contacts.length - 1].updated_at;
            }).catch((error) => {
            console.log('Error: ' + error);
            });
        }
    },
    mounted() {
        this.getContactData();
    }
};
</script>

