<template>
    <edit-render :path_param="path_param" :model="model">
        <div class="row">
            <div class="col-md-6">

                <FormKit v-model="model.id" label="Id" id="id" type="hidden" validation="required" />
                <FormKit v-model="model.title" label="Title" id="title" type="text" validation="required" />
                <FormKit v-model="model.duration" label="Duration" id="duration" type="text" validation="required" />
                <FormKit v-model="model.duration_type" label="Duration Type" id="duration_type" type="select" validation="required" :options="['hour', 'day', 'week', 'month']" placeholder="Select a planet" />
                <FormKit v-model="model.published" label="Published" id="published" type="switch" validation="required" />
            </div>
            <div class="col-md-6">
                <FormKit v-model="model.description" label="Description" id="description" type="textarea" validation="required" />

            </div>
        </div>


    </edit-render>
</template>

<script>
export default {
    data () {
        return {
            id: null,
            path_param: ["isp", "billing_cycle"],
            model: {
                id: "",
                title: "",
                description: "",
                duration: "",
                duration_type: "",
                published: "",
            },

        };
    }
};
</script>
