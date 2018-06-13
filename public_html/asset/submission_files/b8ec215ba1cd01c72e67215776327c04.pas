var
	x,i:integer;
	j,y,k:longint;
	s:array[1..1000] of string;
	t:string;
begin
	readln(x);
	for i:=1 to x do begin
		readln(y);
		for j:=1 to y do begin
			readln(s[j]);
		end;
		for j:=1 to y do begin
			for k:=j to y do begin
				if(((s[j]>s[k]) and ((length(s[j]))=(length(s[k])))) or (length(s[j])>length(s[k]))) then begin
					t:=s[j];
					s[j]:=s[k];
					s[k]:=t;
				end;
			end;
		end;
		for j:=1 to y do writeln(s[j]);
	end;
end.