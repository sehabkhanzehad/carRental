<html>
    <body
        style="
            background-color: #e2e1e0;
            font-family: Open Sans, sans-serif;
            font-size: 100%;
            font-weight: 400;
            line-height: 1.4;
            color: #000;
        "
    >
        <table
            style="
                max-width: 670px;
                margin: 50px auto 10px;
                background-color: #fff;
                padding: 50px;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
                -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12),
                    0 1px 2px rgba(0, 0, 0, 0.24);
                -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12),
                    0 1px 2px rgba(0, 0, 0, 0.24);
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12),
                    0 1px 2px rgba(0, 0, 0, 0.24);
                border-top: solid 10px #5adff7;
            "
        >
            <thead>
                <tr>
                    <th style="text-align: left">
                        <span>
                            CAR<span style="color: #5adff7"
                                >RENTAL</span
                            >
                        </span>
                    </th>
                    <th style="text-align: right; font-weight: 400">
                        {{ date('Y-m-d') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="height: 35px"></td>
                </tr>
                <tr>
                    <td
                        colspan="2"
                        style="border: solid 1px #ddd; padding: 10px 20px"
                    >
                        <p style="font-size: 14px; margin: 0 0 6px 0">
                            <span
                                style="
                                    font-weight: bold;
                                    display: inline-block;
                                    min-width: 150px;
                                "
                                >Rental Status:</span
                            ><b
                                style="
                                    color: green;
                                    font-weight: normal;
                                    margin: 0;
                                "
                                >Success</b
                            >
                        </p>

                        <h4 style="margin: 20px 0 10px 0">Customer Details:</h4>
                        <p style="font-size: 14px; margin: 0 0 6px 0">
                            <span
                                style="
                                    font-weight: bold;
                                    display: inline-block;
                                    min-width: 150px;
                                "
                                >Name:</span
                            ><b
                                style="
                                    color: black;
                                    font-weight: normal;
                                    margin: 0;
                                "
                                >{{ $customer->name }}</b
                            >
                        </p>

                        <p style="font-size: 14px; margin: 0 0 6px 0">
                            <span
                                style="
                                    font-weight: bold;
                                    display: inline-block;
                                    min-width: 150px;
                                "
                                >Email:</span
                            ><b
                                style="
                                    color: black;
                                    font-weight: normal;
                                    margin: 0;
                                "
                                >{{ $customer->email }}</b
                            >
                        </p>

                        <h4 style="margin: 20px 0 10px 0">Rental Details:</h4>
                        <p style="font-size: 14px; margin: 0 0 6px 0">
                            <span
                                style="
                                    font-weight: bold;
                                    display: inline-block;
                                    min-width: 150px;
                                "
                                >Car No:</span
                            ><b
                                style="
                                    color: black;
                                    font-weight: normal;
                                    margin: 0;
                                "
                                >{{ $car->id }}</b
                            >
                        </p>

                        <p style="font-size: 14px; margin: 0 0 6px 0">
                            <span
                                style="
                                    font-weight: bold;
                                    display: inline-block;
                                    min-width: 150px;
                                "
                                >Car Name:</span
                            ><b
                                style="
                                    color: black;
                                    font-weight: normal;
                                    margin: 0;
                                "
                                >{{ $car->name }}</b
                            >
                        </p>


                        <p style="font-size: 14px; margin: 0 0 6px 0">
                            <span
                                style="
                                    font-weight: bold;
                                    display: inline-block;
                                    min-width: 150px;
                                "
                                >Pick Date:</span
                            ><b
                                style="
                                    color: black;
                                    font-weight: normal;
                                    margin: 0;
                                "
                                >{{ $data->pick_date }}</b
                            >
                        </p>
                        <p style="font-size: 14px; margin: 0 0 6px 0">
                            <span
                                style="
                                    font-weight: bold;
                                    display: inline-block;
                                    min-width: 150px;
                                "
                                >Drop Date:</span
                            ><b
                                style="
                                    color: black;
                                    font-weight: normal;
                                    margin: 0;
                                "
                                >{{ $data->drop_date }}</b
                            >
                        </p>
                        <hr>
                        <p style="font-size: 14px; margin: 0 0 6px 0">
                            <span
                                style="
                                    font-weight: bold;
                                    display: inline-block;
                                    min-width: 150px;
                                "
                                >Toral Cost:</span
                            ><b
                                style="
                                    color: black;
                                    font-weight: normal;
                                    margin: 0;
                                "
                                >{{ $data->total_cost }}</b
                            >
                        </p>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="padding: 15px">
                        <p
                            style="
                                font-size: 14px;
                                margin: 0;
                                padding: 10px;
                                border: solid 1px #ddd;
                                font-weight: bold;
                                text-align: center;
                            "
                        >
                            <span
                                style="
                                    display: block;
                                    font-size: 15px;
                                    font-weight: bold;
                                "
                                >Thank You</span
                            >STAY WITH CAR<span style="color: rgb(83, 224, 243)">RENTAL</span>

                        </p>

                    </td>
                </tr>
            </tbody>
            <!-- <tfooter>
                <tr>
                    <td
                        colspan="2"
                        style="font-size: 14px; padding: 50px 15px 0 15px"
                    >
                        <strong style="display: block; margin: 0 0 10px 0"
                            >Regards</strong
                        >
                        Bachana Tours<br />
                        Gorubathan, Pin/Zip - 735221, Darjeeling, West bengal,
                        India<br /><br />
                        <b>Phone:</b> 03552-222011<br />
                        <b>Email:</b> contact@bachanatours.in
                    </td>
                </tr>
            </tfooter> -->
        </table>
    </body>
</html>
