<template>
    <div>
        <el-form v-loading="loading" :loading-text="'Loading...'" @submit.prevent="searchHouses">
            <el-row :gutter="16" class="form-row">
                <el-col :span="4">
                    <el-input v-model="filters.name" placeholder="Name" class="full-width"></el-input>
                </el-col>
                <el-col :span="2">
                    <el-input-number v-model="filters.price_min" placeholder="Price Min" size="mini"></el-input-number>
                </el-col>
                <el-col :span="2">
                    <el-input-number v-model="filters.max" placeholder="Price Max" size="mini"></el-input-number>
                </el-col>
                <el-col :span="3">
                    <el-input-number v-model="filters.bedrooms" placeholder="Bedrooms" class="full-width"></el-input-number>
                </el-col>
                <el-col :span="3">
                    <el-input-number v-model="filters.bathrooms" placeholder="Bathrooms" class="full-width"></el-input-number>
                </el-col>
                <el-col :span="3">
                    <el-input-number v-model="filters.storeys" placeholder="Storeys" class="full-width"></el-input-number>
                </el-col>
                <el-col :span="3">
                    <el-input-number v-model="filters.garages" placeholder="Garages" class="full-width"></el-input-number>
                </el-col>
                <el-col :span="2">
                    <el-button type="primary" @click="searchHouses" class="full-width">Search</el-button>
                </el-col>
            </el-row>
        </el-form>

        <el-table :data="houses" v-if="houses.length" style="width: 100%; margin-top: 20px">
            <el-table-column prop="name" label="Name"></el-table-column>
            <el-table-column prop="price" label="Price"></el-table-column>
            <el-table-column prop="bedrooms" label="Bedrooms"></el-table-column>
            <el-table-column prop="bathrooms" label="Bathrooms"></el-table-column>
            <el-table-column prop="storeys" label="Storeys"></el-table-column>
            <el-table-column prop="garages" label="Garages"></el-table-column>
        </el-table>
        <div v-else-if="!loading && !houses.length" style="text-align: center; margin-top: 20px;">
            No results found
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';

export default {
    name: 'HouseSearch',
    setup() {
        const filters = ref({
            name: '',
            price: null,
            bedrooms: null,
            bathrooms: null,
            storeys: null,
            garages: null,
        });
        const houses = ref([]);
        const loading = ref(false);

        const searchHouses = async () => {
            loading.value = true;
            try {
                const response = await axios.get('/api/houses/search', { params: filters.value });
                const { data } = response;
                houses.value = data.data;
            } catch (error) {
                console.error(error);
            } finally {
                loading.value = false;
            }
        };

        return { filters, houses, searchHouses, loading };
    },
};
</script>

<style scoped>
.form-row {
    display: flex;
    flex-wrap: nowrap;
    gap: 16px;
    align-items: center;
}

.full-width {
    width: 100%;
}

.el-form {
    width: 100%;
}
</style>
