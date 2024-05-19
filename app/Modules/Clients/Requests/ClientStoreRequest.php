<?php

/**
 * InvoicePlane
 *
 * @package     InvoicePlane
 * @author      InvoicePlane Developers & Contributors
 * @copyright   Copyright (C) 2014 - 2018 InvoicePlane
 * @license     https://invoiceplane.com/license
 * @link        https://invoiceplane.com
 *
 * Based on FusionInvoice by Jesse Terry (FusionInvoice, LLC)
 */

namespace IP\Modules\Clients\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [
            'name' => trans('ip.name'),
            'unique_name' => trans('ip.unique_name'),
            'email' => trans('ip.email'),
        ];
    }

    public function prepareForValidation()
    {
        $request = $this->all();

        $request['email'] = $this->input('client_email', $this->input('email', ''));

        unset($request['client_email']);

        $this->replace($request);
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'unique_name' => 'required_with:name|unique:clients',
            'email' => 'email',
        ];
    }
}