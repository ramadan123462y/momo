<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة دواء</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('product/store_product') }}" method="post">
                @csrf
                <div class="modal-body">

                    <div class='row'>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1">اسم دواء</label>
                            <input type="text" class="form-control" id="Product_name" name="Product_name" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1">اسم التجاري للدواء </label>
                            <input type="text" class="form-control" name="trade_Name" required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="form-group col-6">
                            <label> سعر الشراء</label>
                            <input type="number" class="form-control" id="Product_price" name="purchasing_price"
                                required>
                        </div>
                        <div class="form-group col-6">
                            <label> سعر البيع</label>
                            <input type="number" class="form-control" id="Product_price" name="selling_price" required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="form-group col-6">
                            <label> الكميه </label>
                            <input type="number" class="form-control" id="Product_price" name="mount" required>
                        </div>
                        <div class="form-group col-6">
                            <label> تنبيه عدد الكميه</label>
                            <input type="number" class="form-control" id="Product_price" name="notification_mount"
                                required>
                        </div>
                    </div>

                    <div class='row'>
                        <div class="col-6">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">الصنف</label>
                    <select name="section_id" id="section_id" class="form-control" required>
                        <option value="" selected disabled> --حدد الصنف--</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" col-6">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">الوحده</label>
                    <select name="unite_id" id="section_id" class="form-control" required>
                        <option value="" selected disabled> --حدد الوحده--</option>
                        @foreach ($unites as $unite)
                            <option value="{{ $unite->id }}">{{ $unite->name_unite }}</option>
                        @endforeach
                    </select>
                </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">المكان :</label>
                    <textarea class="form-control" required  name="place" rows="1"></textarea>
                </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ملاحظات</label>
                        <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">تاكيد</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
            </form>
        </div>
    </div>
</div>
