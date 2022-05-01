<template>
    <div class="col-11 md:col-6">
      <DataTable 
        :value="rows"  
        :rows="5"
        :loading="loading"
        v-model:expandedRows="expandedRows"
        responsiveLayout="scroll" 
        dataKey="id" 
        removableSort
        :rowHover="false"
        paginator
        >
            <Column 
                :expander="true"
                headerStyle="width: 3rem" 
            />
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
            <template #expansion="slotProps">
              <CommandButtons :commands="slotProps.data.commands" />
            </template>
      </DataTable>
    </div>
</template>

<script>
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Badge from "primevue/badge";
import { onMounted, ref } from "vue";
import CommandButtons from "../commands/Buttons";
import { useFetch } from "../../libs/useFetch";

export default {
  components: {
    DataTable,
    Column,
    Badge,
    CommandButtons
  },
  setup() {
    const rows = ref([]);
    const loading = ref(false);
    const expandedRows = ref([]);

    onMounted(async () => {
      const { data } = await useFetch('computers/list', loading);
      rows.value = data;
    });


    return {
      rows,
      expandedRows,
      loading
    };
  },
};
</script>