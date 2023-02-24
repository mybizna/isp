<template>
    <table-render :path_param="['isp', 'payment']" title="Isp Payment" :table_fields="table_fields">

        <template #header>
            <th-render>Title</th-render>
            <th-render>Invoice</th-render>
            <th-render>Subscription</th-render>
            <th-render>Is Paid</th-render>
            <th-render>Completed</th-render>
            <th-render>Successful</th-render>
        </template>

        <template #body="{ item }">
            <td>{{ item.title }}</td>
            <td>{{ item.invoice_id__account_invoice__title }}</td>
            <td>
                {{ item.subscription_id__isp_subscription___subscriber_id__isp_subscriber__username }}
                {{ item.subscription_id__isp_subscription___package_id__isp_package__title }}
                {{ item.subscription_id__isp_subscription___package_id__isp_package__speed }}
                {{ item.subscription_id__isp_subscription___package_id__isp_package__speed_type }}

            </td>
            <td class="text-center">
                <btn-status :status="item.is_paid"></btn-status>
            </td>
            <td class="text-center">
                <btn-status :status="item.completed"></btn-status>
            </td>
            <td class="text-center">
                <btn-status :status="item.successful"></btn-status>
            </td>
        </template>

    </table-render>
</template>

<script>
export default {
    data() {
        return {
            table_fields: [
                'title AS titled', 'invoice_id__account_invoice__title', 'is_paid', 'completed', 'successful',
                'subscription_id__isp_subscription__subscriber_id___isp_subscriber__username AS isp_subscriber_username',
                'subscription_id__isp_subscription__package_id___isp_package__title AS isp_package_title',
                'subscription_id__isp_subscription__package_id___isp_package__speed AS isp_package_speed',
                'subscription_id__isp_subscription__package_id___isp_package__speed_type AS isp_package_speed_type'
            ],

        };
    },
};
</script>
