var
	bool:array[1..1000000] of boolean;
	x,s,j,i,n,count:longint;
begin
	readln(x);
	for i:=1 to x do begin
		count:=0;
		readln(n);
		for j:=1 to n do begin
			bool[j]:=false;
		end;
		for s:=1 to n do begin
			for j:=1 to n do begin
				if((j mod s=0) and (bool[j]=false)) then 
					bool[j]:=true
				else if ((j mod s=0) and (bool[j]=true)) then
					bool[j]:=false;
			end;
		end;
		for s:=1 to n do begin
			if(bool[s]) then inc(count);
		end;
		writeln(count);
	end;
end.