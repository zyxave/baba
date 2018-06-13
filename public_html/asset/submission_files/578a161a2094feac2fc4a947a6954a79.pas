var  n,k,j,max,i:longint;
	s:string;
	a:array[1..26] of longint;
	b,c:boolean;
begin
	readln(n);
	for k:= 1 to n do begin
	max:=0;
	c:=true;
	b:=false;
	for i:= 1 to 26 do a[i]:=0;
		readln(s);
		for j:= 1 to length(s) do begin
			inc(a[ord(s[j])-96]);
		end;
	for i:= 1 to 26 do begin
		if a[i]<>0 then begin
			if max<a[i] then max:=a[i];
		end;
	end;
	for i:= 1 to 26 do begin
			if a[i]= max then b:=true
			else begin
				if a[i]<>0 then begin
				if (a[i]+1 = max) and c then begin
					b:=true;
					c:=false;
				end
				else begin
				b:=false;
				break;
				end;
				end;
			end;
	end;
	if b then writeln('YES')
	else if not(b) then writeln('NO');
	end;
	end.