<template>
    <table-edit :path_param="path_param" :model="model">

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

    </table-edit>
</template>

<script>
export default {
    components: {
        TableEdit: window.$func.fetchComponent("components/common/TableEdit.vue")
    },
    data() {
        return {
            id: null,
            path_param: ["isp", "subscriber"],
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
