<template>
  <CHeader>
    <CContainer fluid>
      <CHeaderBrand href="javascript:void(0)" id="header">
        <h2>SKILLS MANAGER</h2>
        <router-link
          class="btn btn-info rounded-pill"
          :to="{ name: 'CreateSkill' }"
        >
          <CIcon :icon="cilPlus" size="xs" /> Add
        </router-link>
      </CHeaderBrand>
    </CContainer>
  </CHeader>
  <CTable>
    <CTableHead>
      <CTableRow>
        <CTableHeaderCell scope="col">#</CTableHeaderCell>
        <CTableHeaderCell scope="col">Skill Name</CTableHeaderCell>
        <CTableHeaderCell scope="col">Image</CTableHeaderCell>
        <CTableHeaderCell scope="col">Functions</CTableHeaderCell>
      </CTableRow>
    </CTableHead>
    <CTableBody>
      <CTableRow>
        <CTableHeaderCell scope="row">1</CTableHeaderCell>
        <CTableDataCell>PHP</CTableDataCell>
        <CTableDataCell>PHP image</CTableDataCell>
        <CTableDataCell>
          <router-link
            class="btn btn-warning rounded-pill margin_right_10"
            :to="{ name: 'EditSkill', params: { idSkill: 1 } }"
          >
            <CIcon :icon="cilPen" size="xs" /> Edit
          </router-link>
          <CButton color="danger" shape="rounded-pill">
            <CIcon :icon="cilDelete" size="xs" /> Delete
          </CButton>
        </CTableDataCell>
      </CTableRow>
    </CTableBody>
  </CTable>
  <router-view></router-view>
</template>
<script>
import { cilPlus, cilPen, cilDelete } from '@coreui/icons'

export default {
  name: 'ListWebsiteInforView',
  setup() {
    return {
      cilPlus,
      cilPen,
      cilDelete,
    }
  },
}
</script>
<style scoped></style>
