<div>
    <form action="">
        <fieldset class=" p-4 border-2 w-fit rounded-2xl">
            <legend class=" font-bold text-2xl text-amber-600">Add Applicants</legend>
            <div class="flex ">
                <div class="flex space-x-3">
                    <div>
                        <x-input label="Last Name" placeholder="Enter Last name"/>
                    </div>
                    <div>
                        <x-input label="First Name" placeholder="Enter First name"/>
                    </div>
                    <div>
                        <x-input label="Middle name" placeholder="Enter Middle name"/>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex space-x-3 items-center  justify-center">
                    <div>
                        <x-native-select label="Select Gender" :options="[
                            ['name' => 'Gender', 'id' => 1],
                            ['name' => 'Male', 'id' => 2],
                            ['name' => 'Female', 'id' => 3],
                        ]" option-label="name" option-value="id"/>
                    </div>
                    <div class="w-[30%]">
                        <label for="date" class=" text-sm">Birth Date</label>
                        <input type="date"class="h-[35px] p-1 w-full rounded-md">
                    </div>
                    <div>
                        <x-phone
                        id="multiple-mask"
                        label="Contact"
                        placeholder="Phone"
                        :mask="['(###) ###-####', '+# ### ###-####', '+## ## ####-####']"
                    />
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-[80%]">
                    <x-input label="Adress" placeholder="Your Adrress"/>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-[80%]">
                    <x-input label="Email" placeholder="Your Email"/>
                </div>

            </div>
            <div>
                <div class="flex space-x-3 items-center justify-center">
                    <div>
                        <x-input label="Nationality" placeholder="Your Nationality"   corner="Ex: Filipino"/>
                    </div>
                    <div>
                        <x-native-select label="Civil Status" :options="[
                            ['name' => 'Civil', 'id' => 1],
                            ['name' => 'Single', 'id' => 2],
                            ['name' => 'Married', 'id' => 3],
                            ['name' => 'Divorced', 'id' => 4],
                        ]" option-label="name" option-value="id"/>
                    </div>
                    <div>
                        <x-native-select label="Select Religion" :options="[
                            ['name' => 'Religon', 'id' => 1],
                            ['name' => 'Catholic', 'id' => 2],
                            ['name' => 'Muslim', 'id' => 3],
                            ['name' => 'Iglesia ni Cristo', 'id' => 4],
                            ['name' => 'Born Again', 'id' => 5],
                        ]" option-label="name" option-value="id"/>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center">
                <div class="w-[50%]">
                    <x-input icon="user" label="Refered by" placeholder="Enter Full Name"/>
                </div>
            </div>
        </fieldset>
        <div class="flex justify-end items-center m-2">
            <x-button emerald label="Submit" />
        </div>
    </form>
</div>
