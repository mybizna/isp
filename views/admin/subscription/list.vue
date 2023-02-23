
<template>
    <table-render :path_param="['isp', 'subscription']" title="Isp Subscription" :table_fields="table_fields">
      
        <template #header>
            <th-render>Package</th-render>
            <th-render>Subscriber</th-render>
            <th-render>Start Date</th-render>
            <th-render>End Date</th-render>
        </template>
  
        <template #body="{ item }">
            <td>{{ item.package_id__isp_package__title }}</td>
            <td>{{ item.subscriber_id__isp_subscriber__username }}</td>
            <td>{{ item.start_date }}</td>
            <td>{{ item.end_date }}</td>
        </template>


    </table-render>
</template>

<script>

export default {
    data() {
        return {
            table_fields: [
                'package_id__isp_package__title','subscriber_id__isp_subscriber__username',
                'package_id','subscriber_id','start_date','end_date'
            ],
          
        };
    }
};
</script>
