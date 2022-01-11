<template>
    <div class="content">
        <h1>View All Contacts</h1>
            <div v-if="contacts"
                 v-for="contact in contacts">
                <p>{{ contact.name }}</p>
                <p>{{ contact.email }}</p>
                <p>{{ contact.job_role }}</p>
                <p>{{ contact.phone_number }}</p>
                <a :href="'/manage-contact/' + contact.id">
                    <button>Manage Contact</button>
                </a>
                <a :href="'/view-contact/' + contact.id">
                    <button>View Contact</button>
                </a>
                <hr>
            </div>
        <button v-on:click="getContactData">Load More</button>
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
                    this.contacts = JSON.parse(data);
                    this.id = this.contacts[this.contacts.length - 1].id;
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

