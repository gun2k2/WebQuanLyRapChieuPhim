function($)
{



$('a.verify_action').click(function()
{
	if (!confirm('Bạn chắc chắn muốn xóa ?')) 
		{ 
			return false;
		}



	});
}