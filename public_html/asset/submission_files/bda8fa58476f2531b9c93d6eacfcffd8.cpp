#include<bits/stdc++.h>
#define pb push_back
using namespace std;
vector<int>ver;
vector<int>hor;
int tc,n,m,q;
int a,b;

int main()
{
	scanf("%d",&tc);
	while(tc--)
	{
		ver.clear();hor.clear();
		scanf("%d %d %d",&n,&m,&q);
		ver.pb(1);
		hor.pb(1);
		ver.pb(n);
		hor.pb(m);
		for(int x = 1 ; x <= q ; x++)
		{
			scanf("%d %d",&a,&b);
			ver.pb(a);
			hor.pb(b);
		}
		
		
		sort(ver.begin(),ver.end());
		sort(hor.begin(),hor.end());
		int nyak = 0;
		int now = 1;
		
		int ma_x = 0;
		int ma_y = 0;
		int mi_x = 110;
		int mi_y = 110;
		
		for(int x = 1 ; x < ver.size() ; x++)
		{
			if(ver[x] != ver[x-1]) 
			{
				nyak = nyak + now;
			}
			ma_x =  max(ma_x,ver[x] - ver[x - 1]);
			mi_x =  min(mi_x,ver[x] - ver[x - 1]);
		}
		
		now = nyak;
		nyak = 0;
		for(int x = 1 ; x < hor.size() ; x++)
		{
			if(hor[x] != hor[x-1]) 
			{
				nyak = nyak + now;
			}
			ma_y =  max(ma_y,hor[x] - hor[x - 1]);
			mi_y =  min(mi_y,hor[x] - hor[x - 1]);
		}
		printf("%d %d %d\n",nyak,mi_x * mi_y,ma_x * ma_y);
	}
}
