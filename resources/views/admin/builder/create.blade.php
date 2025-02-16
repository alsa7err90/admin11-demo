<x-admin-layout>
    <x-slot name="header">
        {{ __('Builder Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Create New Page') }}
    </x-slot>
    <!-- شرح وظيفة الصفحة -->
    <x-alert type="info">
        <p dir="rtl">
            هذه الصفحة تتيح لك إنشاء صفحات CRUD ديناميكية تشمل الويب، لوحة الإدارة، وواجهات API بسهولة.
            يمكنك تحديد اسم الصفحة، النموذج، وحدة التحكم، والمسار المرتبط بها.
            كما يمكنك إضافة حقول مخصصة مع تعيين نوع البيانات، الطول اذا كان يلزم او القيم التي تحتاجها بعض الانواع، القيم الافتراضية، قواعد التحقق، وغيرها من الخصائص.
            إذا كنت بحاجة إلى نوع بيانات غير متوفر يمكنك إضافته يدويًا إلى القائمة المنسدلة الخاصة بأنواع البيانات.
        </p>
    </x-alert>

    <form action="{{ route('admin.builder.store') }}" method="POST" id="pageGeneratorForm">
        @csrf

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <x-input.text name="page_name" label="Page Name" required />
            <x-input.text name="model_name" label="Model Name" required />
            <x-input.text name="controller_name" label="Controller Name" required />
            <x-input.text name="route_name" label="Route Name" required />
        </div>

        <!-- الحقول -->
        <div class="mt-6">
            <h3 class="mb-2 text-lg font-medium text-gray-700">{{ __('Fields') }}</h3>
            <table class="min-w-full bg-white border">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">{{ __('Field Name') }}</th>
                        <th class="px-4 py-2 border-b">{{ __('Data Type') }}</th>
                        <th class="px-4 py-2 border-b">{{ __('Length/Values') }}</th>
                        <th class="px-4 py-2 border-b">{{ __('Nullable') }}</th>
                        <th class="px-4 py-2 border-b">{{ __('Unique') }}</th>
                        <th class="px-4 py-2 border-b">{{ __('Default Value') }}</th>
                        <th class="px-4 py-2 border-b">{{ __('Comment') }}</th>
                        <th class="px-4 py-2 border-b">{{ __('Validation Rules') }}</th>
                        <th class="px-4 py-2 border-b">
                            <button type="button" id="add-field"
                                class="inline-flex items-center px-2 py-1 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                                {{ __('Add Field') }}
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody id="fields-table-body">
                    <!-- الحقول الديناميكية ستضاف هنا -->
                </tbody>
            </table>
        </div>
        <!-- خيار Soft Deletes -->
        <div class="mb-4">
            <label for="soft_deletes" class="inline-flex items-center">
                <input type="checkbox" name="soft_deletes" id="soft_deletes" value="1" class="form-checkbox">
                <span class="ml-2">{{ __('Use Soft Deletes') }}</span>
            </label>
        </div>
        <div class="mb-4">
            <button type="submit" class="px-4 py-2 font-semibold text-white bg-green-600 rounded hover:bg-green-700">
                {{ __('Generate') }}
            </button>
        </div>
    </form>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $(document).ready(function() {
                    let fieldIndex = 0;

                    $('#add-field').click(function() {
                        let row = `
                        <tr>
                            <td class="px-4 py-2 border">
                                <input type="text" name="fields[${fieldIndex}][name]" required
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </td>
                            <td class="px-4 py-2 border">
                                <select name="fields[${fieldIndex}][type]" required
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                                    <!-- أنواع البيانات -->
                                    <option value="string">String</option>
                                    <option value="text">Text</option>
                                    <option value="integer">Integer</option>
                                    <option value="boolean">Boolean</option>
                                    <option value="date">Date</option>
                                    <option value="datetime">DateTime</option>
                                    <option value="float">Float</option>
                                    <option value="decimal">Decimal</option>
                                    <option value="enum">Enum</option>
                                    <!-- أضف المزيد من الأنواع حسب الحاجة -->
                                </select>
                            </td>
                            <td class="px-4 py-2 border">
                                <input type="text" name="fields[${fieldIndex}][length]" placeholder="Length/Values"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </td>
                            <td class="px-4 py-2 text-center border">
                                <input type="checkbox" name="fields[${fieldIndex}][nullable]" value="1"
                                    class="mt-1">
                            </td>
                              <td class="px-4 py-2 text-center border">
                                <input type="checkbox" name="fields[${fieldIndex}][unique]" value="1"
                                    class="mt-1">
                            </td>
                            <td class="px-4 py-2 border">
                                <input type="text" name="fields[${fieldIndex}][default]" placeholder="Default Value"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </td>
                            <td class="px-4 py-2 border">
                                <input type="text" name="fields[${fieldIndex}][comment]" placeholder="{{ __('Comment') }}"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </td>
                            <td class="px-4 py-2 border">
                                <input type="text" name="fields[${fieldIndex}][validation]"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm"
                                    placeholder="مثال: required|string|max:255">
                            </td>
                            <td class="px-4 py-2 text-center border">
                                <button type="button" class="text-red-600 remove-field hover:text-red-800">
                                    {{ __('Delete') }}
                                </button>
                            </td>
                        </tr>
                    `;
                        $('#fields-table-body').append(row);
                        fieldIndex++;
                    });

                    $('#fields-table-body').on('click', '.remove-field', function() {
                        $(this).closest('tr').remove();
                    });
                });
            });
        </script>
    @endpush
</x-admin-layout>
