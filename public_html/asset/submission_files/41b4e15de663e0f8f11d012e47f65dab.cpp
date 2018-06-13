#include<bits/stdc++.h>
using namespace std;

typedef unsigned long long ll;
ll tc,p,q;
ll ans[55];

ll kombin(ll atas,ll bawah)
{
	if(atas - bawah > bawah) bawah = atas - bawah;
	
	ll now = 1;
	ll bagi = 2;
	for(int x = bawah + 1; x <= atas; x++)
	{
		now = now * x;
		while(now % bagi == 0 && bagi <= atas - bawah)
		{
			now = now / bagi;
			bagi++;
		}
	}
	return now;
}

int main()
{
	cin >> tc;
	while(tc--)
	{
		cin >> p >> q;
		ans[0] = 1;
		
		for(int x = 1; x <= q ; x++)
		{
			ll now = kombin(q,x);
			for(int y = 1 ; y <= x; y++) now = now * p;
			
			ans[x] = now;
		}
		
		for(int x = 0 ; x <= q ; x++)
		{
			if(x == 0) printf("x%d",q - x);
			else if(ans[x] == 0) ;
			else if(x == q) printf(" %d",ans[x]);
			else if(x == q - 1) printf(" %dx",ans[x]);
			else printf(" %dx%d",ans[x],q - x);
		}
		printf("\n");
	}
}
