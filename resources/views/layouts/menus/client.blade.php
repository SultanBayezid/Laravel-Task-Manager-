<li>
	<a href="#" aria-expanded="false"><i class="fas fa-cart-plus"></i>&nbsp;<span class="menu-title">{{ _lang('Invoices') }}</span> <span class="glyphicon arrow"></span></a>
	<ul aria-expanded="false" class="collapse">
		<li><a href="{{ url('client/invoices') }}">{{ _lang('All Invoices') }}</a></li>
		<li><a href="{{ url('client/invoices/Unpaid') }}">{{ _lang('Unpaid Invoices') }}</a></li>
		<li><a href="{{ url('client/invoices/Paid') }}">{{ _lang('Paid Invoices') }}</a></li>
		<li><a href="{{ url('client/invoices/Partially_Paid') }}">{{ _lang('Partially Paid Invoices') }}</a></li>
		<li><a href="{{ url('client/invoices/Canceled') }}">{{ _lang('Canceled Invoices') }}</a></li>
	</ul>
</li>
<li><a href="{{ url('client/quotations') }}" aria-expanded="false"><i class="far fa-copy"></i>&nbsp;<span class="menu-title">{{ _lang('Quotation') }}</span></a></li>
<li><a href="{{ url('client/transactions') }}" aria-expanded="false"><i class="far fa-credit-card"></i>&nbsp;<span class="menu-title">{{ _lang('Transactions') }}</span></a></li>