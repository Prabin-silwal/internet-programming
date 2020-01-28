function calculate() {
	
	let a,b,c,d;
	a=document.getElementById("n1").value;
	b=document.getElementById("n2").value;
	d=document.getElementById("operand").value;
	if(d=='+'){
		c=parsefloat(a)+parsefloat(b);
		document.getElementById('result').innerHTML=c;

	}
	else if(d=='-'){
		c=parsefloat(a)-parsefloat(b);
		document.getElementById('result').innerHTML=c;
		
	}
	else if(d=='*'){
		c=parsefloat(a)*parsefloat(b);
		document.getElementById('result').innerHTML=c;
		
	}
	 else if(d=='/'){
		c=parsefloat(a)/parsefloat(b);
		document.getElementById('result').innerHTML=c;
		
	}
}