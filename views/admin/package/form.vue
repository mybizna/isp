<template>
    <edit-render :path_param="['isp', 'package']" :model="model">

        <div class="row">
            <div class="col-md-6">

                <FormKit v-model="model.id" label="Id" id="id" type="hidden" validation="required" />
                <FormKit v-model="model.title" label="Title" id="title" type="text" validation="required" />
                <FormKit v-model="model.slug" label="Slug" id="slug" type="text" validation="required" />
                <FormKit v-model="model.billing_cycle_id" label="Billing Cycle" id="billing_cycle_id"
                    :setting="setting.billing_cycle_id" type="recordselect" validation="required" />

                <div class="row">
                    <div class="col-md-4">
                        <b>Speed</b>
                    </div>
                    <div class="col-md-8">
                        <div class="flex">
                            <div class="flex-auto">
                                <FormKit v-model="model.speed" id="speed" type="text" validation="required"
                                    inner-class="$reset formkit-inner" wrapper-class="$reset formkit-wrapper" />
                            </div>
                            <div class="flex-none w-20">
                                <FormKit v-model="model.speed_type" id="speed_type" type="select" validation="required"
                                    :options="{ 'kilobyte': 'KBps', 'megabyte': 'MBps', 'gigabyte': 'GBps' }" inner-class="$reset formkit-inner"
                                    wrapper-class="$reset formkit-wrapper" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <b>Bundle</b>
                    </div>
                    <div class="col-md-8">
                        <div class="flex">
                            <div class="flex-auto">
                                <FormKit v-model="model.bundle" id="bundle" type="text" validation="required"
                                    inner-class="$reset formkit-inner" wrapper-class="$reset formkit-wrapper" />
                            </div>
                            <div class="flex-none w-20">
                                <FormKit v-model="model.bundle_type" id="bundle_type" type="select" validation="required"
                                    :options="{ 'kilobyte': 'KB', 'megabyte': 'MB', 'gigabyte': 'GB' }"
                                    inner-class="$reset formkit-inner" wrapper-class="$reset formkit-wrapper" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <FormKit v-model="model.description" label="Description" id="editor" type="textarea"
                    validation="required" />
                <div class="grid grid-cols-2">
                    <FormKit v-model="model.published" label="Published" id="published" type="switch"
                        validation="required" />
                    <FormKit v-model="model.is_hidden" label="Hidden in Portal" id="is_hidden" type="switch"
                        validation="required" />
                    <FormKit v-model="model.featured" label="Featured" id="featured" type="switch" validation="required" />
                    <FormKit v-model="model.default" label="Default" id="default" type="switch" validation="required" />
                </div>
            </div>
        </div>


    </edit-render>
</template>

<script>
export default {
    data() {
        return {
            id: null,
            model: {
                id: "",
                title: "",
                slug: "",
                description: "",
                billing_cycle_id: "",
                speed: "",
                speed_type: "",
                published: "",
                is_hidden: "",
                featured: "",
                amount: "",
            },
            setting: {
                billing_cycle_id: {
                    url: "isp/admin/billing_cycle/recordselect",
                    fields: ['title'],
                    template: '[title]',
                },

            }
        };
    }
};
</script>
