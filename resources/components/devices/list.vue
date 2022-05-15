<template>
  <div class="col-11 md:col-6">
    <Form :show="dialog" />
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
        <TablesHeader title="Dispositivos" :dialog="dialog" />
      </template>
      <Column :expander="true" headerStyle="width: 3rem" />
      <Column header="IP" field="ip" sortable />
      <Column header="Máscara" field="mask" sortable />
      <Column header="Estado" field="active" sortable>
        <template #body="{ data }">
          <Badge :severity="data.active ? 'success' : 'danger'">
            {{ data.active ? "Conectado" : "Sin conexión" }}
          </Badge>
        </template>
      </Column>
      <Column>
        <template #body="{ data }">
          <router-link :to="'/monitoring/' + data.id">
            <Button icon="pi pi-eye" />
          </router-link>
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
import tablesHeader from "../utils/tablesHeader";
import Button from "primevue/button";
import { onMounted, ref } from "vue";
import CommandButtons from "../commands/Buttons";
import { useFetch } from "../../libs/useFetch";
import TablesHeader from "../utils/tablesHeader";
import Form from "./form";

export default {
  components: {
    DataTable,
    Column,
    Badge,
    Button,
    CommandButtons,
    tablesHeader,
    TablesHeader,
    Form,
  },
  setup() {
    const dialog = ref({ state: false });
    const rows = ref([]);
    const loading = ref(false);
    const expandedRows = ref([]);

    onMounted(async () => {
      const { data } = await useFetch("computers/list", loading);
      rows.value = data;
    });

    return {
      rows,
      expandedRows,
      loading,
      dialog,
    };
  },
};
</script>