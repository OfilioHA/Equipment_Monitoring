<template>
  <div class="col-11 md:col-6 px-2">
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
      <template #header>
        <TablesHeader
          title="Historial" 
          :dialog="dialog"
        />
      </template>
      <Column :expander="true" headerStyle="width: 3rem" />
      <Column header="IP" field="ip" sortable />
      <Column header="Creado" field="created_at" sortable />
      <Column header="Resultado" field="successful" sortable>
        <template #body="{ data }">
          <Badge :severity="data.successful ? 'success' : 'danger'">
            {{ data.successful ? "Exitoso" : "Fallido" }}
          </Badge>
        </template>
      </Column>
      <template #expansion="slotProps">
        <p>{{slotProps.data.output}}</p>
      </template>
    </DataTable>
  </div>
</template>

<script>
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Badge from "primevue/badge";
import TablesHeader from "../utils/tablesHeader";
import { onMounted, ref } from "vue";
import { useFetch } from "../../libs/useFetch";

export default {
  components: {
    DataTable,
    Column,
    Badge,
    TablesHeader,
},
  setup() {
    const dialog = ref({state: false});
    const rows = ref([]);
    const loading = ref(false);
    const expandedRows = ref([]);

    onMounted(async () => {
      const { data } = await useFetch("computers/history", loading);
      rows.value = data;
    });

    return {
      rows,
      expandedRows,
      loading,
      dialog
    };
  },
};
</script>