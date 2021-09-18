<template>

	<!-- Billing Information Card -->
	<a-card :bordered="false" class="header-solid h-full" :bodyStyle="{paddingTop: 0, paddingBottom: '16px' }">
		<template #title>
			<h6 class="font-semibold m-0">Billing Information</h6>
		</template>
		<a-row :gutter="[24, 24]">
			<a-col :span="24" v-for="(item,index) in dataBilling" :key="item.product_id+''">
			<a-card :bordered="false" class="card-billing-info" v-bind:class="[item.status == 'doing' ? 'bg-primary': '', item.status == 'done' ? 'bg-success': '', item.status == 'denied' ? 'bg-danger': '']">
				<div class="col-info">
					<a-descriptions :title="item.name" :column="1">
						<a-descriptions-item label="Số lượng">
							{{item.salary}}
						</a-descriptions-item>
						<a-descriptions-item label="Tổng tiền">
							{{item.money}}
						</a-descriptions-item>
						<a-descriptions-item label="Số điện thoại">
							{{item.numberphone}}
						</a-descriptions-item>
						<a-descriptions-item label="Địa chỉ">
							{{item.address}}
						</a-descriptions-item>
						<a-descriptions-item label="Thời gian đặt">
							{{item.order_time}}
						</a-descriptions-item>
						<a-descriptions-item label="Ghi chú">
							{{item.note}}
						</a-descriptions-item>
					</a-descriptions>
				</div>
				<div class="col-action">
					<a-button type="link" size="small" @click="checkDoing(index)">
						<a-icon type="car" />
						<span class="text-primary">Đang giao</span>
					</a-button>
					<a-button type="link" size="small" @click="checkDone(index)">
						<a-icon type="check" />
						<span class="text-success">Đã giao</span>
					</a-button>
					<a-button type="link" size="small" @click="checkDenied(index)">
						<a-icon type="warning" />
						<span class="text-danger">Báo hết</span>
					</a-button>
				</div>
			</a-card>
			</a-col>
		</a-row>
	</a-card>
	<!-- / Billing Information Card -->

</template>
<style>
	.bg-primary{
		background-color: #1890FF!important;
		color: #FFFFFF!important;
	}
	.bg-success{
		background-color: #52C41A!important;
		color: #FFFFFF!important;
	}
	.bg-danger{
		background-color: #F5222D!important;
		color: #FFFFFF!important;
	}
</style>
<script>
export default ({
	props: ["dataBilling"],
	methods: {
		checkDoing(index){
			this.dataBilling[index].status = "doing";
			this.fecthStatus(index);
		},
		checkDone(index){
			this.dataBilling[index].status = "done";
			this.fecthStatus(index);
		},
		checkDenied(index){
			this.dataBilling[index].status = "denied";
			this.fecthStatus(index);
		},
		fecthStatus(index){
			var self = this;
			Vue.axios
			.put(`/api/bills/updateStatus?id=${this.dataBilling[index].id}&status=${this.dataBilling[index].status}`)
			.then(response =>{
				self.$message.success("Cập nhật thành công!");
			})
			.catch(error =>{
				console.error(error);
				self.$message.error("Lỗi nội bộ!");
			})
		}
	}
})
</script>