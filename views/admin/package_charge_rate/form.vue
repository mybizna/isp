<template>
    <edit-render :path_param="path_param" :model="model">

        <div class="row">
            <div class="col-md-6">
                <FormKit v-model="model.id"  label="Id" id="id" type="hidden" validation="required" />
                <FormKit v-model="model.package_charge_id"  label="Package Charge" id="package_charge_id" type="text" validation="required" />
                <FormKit v-model="model.rate_id"  label="Rate" id="rate_id" type="text" validation="required" />
            </div>
            <div class="col-md-6">
                <FormKit v-model="model.published"  label="Published" id="published" type="switch" validation="required" />
            </div>
        </div>

    </edit-render>
</template>

<script>
export default {
    data () {
        return {
            id: null,
            path_param: ["isp", "package_charge_rate"],
            model: {
                id: "",
                package_charge_id: "",
                rate_id: "",
                published: "",
            },

        };
    }
};
</script>
