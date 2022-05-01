<template>
  <div class="grid grid-nogutter justify-content-center">
    <div class="col-11 md:col-8">
      <DataTable 
        :value="rows"  
        :rows="5"
        :loading="loading"
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
            <Column
                header="Estado" 
                field="active" 
                sortable
            >
              <template #body="{data}">
                <Badge
                  :severity="data.active ? 'success' : 'danger'"
                >
                {{data.active ? 'Conectado' : 'Sin conexión'}}
                </Badge>
              </template>
            </Column>
      </DataTable>
    </div>
  </div>
</template>

<script>
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Badge from "primevue/badge";
import { onMounted, ref } from "vue";
import { useFetch } from "../../libs/useFetch";

export default {
  components: {
    DataTable,
    Column,
    Badge
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
      loading
    };
  },
};
</script>