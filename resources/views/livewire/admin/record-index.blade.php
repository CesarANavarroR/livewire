<section class="content">
        <div class="box-body">
            <div class="form-group">
                <div class="card card-red">
                    <div class="card-header">
                        <h3 class="card-title">Records search</h3>
                    </div>
                    <div class="card-body">
                        <form id="formBusq" class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Initial date                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" class="form-control" min="2021-03-22" max="2021-03-22" style="border: 1px solid lightgray;" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Final date</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" class="form-control" min="2021-03-22" :max="2021-03-22" style="border: 1px solid lightgray;" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Table</label>
                                        <select  class="form-control">
                                            <option selected disabled>Select an option</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Records
            </div>

            

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Table</th>
                            <th>Order Details</th>
                            <th>Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</section>
