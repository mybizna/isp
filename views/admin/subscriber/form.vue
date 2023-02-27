<template>
    <edit-render :path_param="['isp', 'subscriber']" :model="model">

        <div class="row">
            <div class="col-md-6">
                <FormKit v-model="model.id" label="Id" id="id" type="hidden" validation="required" />
                <FormKit v-model="model.username" label="Username" id="username" type="text" validation="required" />
                <FormKit v-model="model.password" label="Password" id="password" type="text" validation="required" />
                <FormKit button_label="Select Customer" id="partner_id" type="recordpicker"
                    comp_url="partner/admin/partner/list.vue" :setting="setting.partner_id" v-model="model.partner_id"
                    validation="required" inner-class="$reset formkit-inner" wrapper-class="$reset formkit-wrapper" />

            </div>
            <div class="col-md-6">

            </div>
        </div>

    </edit-render>
</template>

<script>
export default {
    data() {
        return {
            id: null,
            setting: {
                partner_id: {
                    path_param: ["partner", "partner"],
                    fields: ['first_name', 'last_name', 'email'],
                    template: '[first_name] [last_name] - [email]',
                },
            },
            model: {
                id: "",
                username: "",
                password: "",
                partner_id: "",
            },

        };

    }
};
</script>
