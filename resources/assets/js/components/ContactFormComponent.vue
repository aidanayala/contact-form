<template>

    <div>

        <!-- contact form -->
        <div v-show="!submitted" class="form-container animated fadeInDownBig">
            <form>
                <div class="form-group">
                    <div class="form-control text-center">
                        <i class="text-blue fa fa-envelope fa-4x"></i>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <label for="name">
                            Name
                        </label>
                        <input class="form-input" id="name" type="text" placeholder="" autofocus v-model="form.name">
                        <p v-if="errors.name" class="form-error-message">
                            {{errors.name[0]}}
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <label for="email">
                            E-mail Address
                        </label>
                        <input class="form-input" id="email" type="email" placeholder="" v-model="form.email">
                        <p v-if="errors.email" class="form-error-message">
                            {{errors.email[0]}}
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <label for="text">
                            Enquiry Text
                        </label>
                        <textarea class="form-input" id="text" placeholder="" rows="5"
                                  v-model="form.text"></textarea>
                        <p v-if="errors.text" class="form-error-message">
                            {{errors.text[0]}}
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <button :disabled="state==1 || submitted==1" v-on:click="submit()" type="button">
                            <span v-if="state==0">Send it!</span><i v-bind:class="[state == 0 ? 'fa-paper-plane' : 'fa-spinner fa-spin']" class="ml-2 fa"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /contact form -->

        <!-- success form -->
        <div v-show="submitted" class="card-container animated flipInX">
            <div class="card">
                <div class="card-icon">
                    <i class="text-green fa fa-check fa-4x"></i>
                </div>
                <div class="card-heading">
                    Our pigeons have successfully delivered your message!
                </div>
                <div class="card-subheading">
                    We'll be in touch.
                </div>
                <div class="card-body">
                    <span class="enquiry-label">Name</span>
                    <span class="enquiry-content">{{form.name}}</span>
                    <span class="enquiry-label">E-mail Address</span>
                    <span class="enquiry-content">{{form.email}}</span>
                    <span class="enquiry-label">Enquiry Text</span>
                    <span class="enquiry-content">{{form.text}}</span>
                </div>
            </div>
        </div>
        <!-- /success form -->

    </div>

</template>

<script>
    /**
     * Handles the data capture & user submission side of the contact form
     */
    export default {
        data() {
            return {
                form: {}, // holds form model attributes
                errors: [], // holds form errors
                submitted: false, // boolean on if the forms been successfully submitted or not
                state: 0, // holds the state of the form submission [0 = awaiting input, 1 = request sent]
            }
        },
        methods: {

            // called when the forms submit button is pressed
            submit() {

                // clear errors before submitting, to remove any errors from previous request
                this.clearErrors();

                this.setState(1);

                // validate the contact form then if valid, submit it. otherwise handle the error
                axios.post('/contact', this.form).then((response) => { // handle success

                    // if success then reset the form
                    if (response.data.success) {
                        this.submitted = true;
                        this.success = response.data.message;
                    } else {
                        // handle failed
                    }

                    this.setState(0);

                }).catch((error) => { // handle error response
                    switch (error.response.status) {
                        case 422: // Un-processable Entity failure
                            this.errors = error.response.data.errors;
                            break;
                        default:
                            // TODO: handle other errors
                            break;
                    }
                    this.setState(0);
                });
            },

            setState(state) {
                this.state = state;
            },

            clearErrors() {
                this.errors = [];
            }
        }
    }
</script>
