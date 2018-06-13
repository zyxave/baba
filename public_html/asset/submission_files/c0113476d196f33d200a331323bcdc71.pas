var
	i,j,x,a,count,y,b,c:longint;
	z:int32;
begin
	readln(x);
	for i:=1 to x do begin
		count:=0;
		y:=1;
		z:=10;
		readln(a);
		repeat
			if(y>=z*10) then z:=z*10;
			b:=0;
			c:=0;
			if((y div z<>0) or (y div z*10<>0)) then begin
				b:=y div z;
				c:=y mod z;
				if(((c*z+b)<=a) and (((c+1)*z+b)>a)) then begin
					y:=(c*10)+b;
					inc(count);
				end;
			end;
			if(y=a) then break;
			inc(y);
			inc(count);
		until(y=a);
		writeln(count);
	end;
end.