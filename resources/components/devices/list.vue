<template>
  <div class="grid grid-nogutter justify-content-center">
    <div class="col-11 md:col-8">
      <DataTable 
        :value="rows"  
        :rows="5"
        responsiveLayout="scroll" 
        dataKey="id" 
        removableSort
        rowHover 
        paginator
        >
            <Column 
                header="IP" 
                field="ip" 
                sortable 
            />
            <Column 
                header="Máscara" 
                field="mask" 
                sortable 
            />
      </DataTable>
    </div>
  </div>
</template>

<script>
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import { onMounted, ref } from "vue";
import { useFetch } from "../../libs/useFetch";

export default {
  components: {
    DataTable,
    Column,
  },
  setup() {
    const rows = ref([]);
    const loading = ref(false);

    onMounted(async () => {
      const { data } = await useFetch('computers/list', loading);
      rows.value = data;
    });


    return {
      rows,
    };
  },
};
</script>