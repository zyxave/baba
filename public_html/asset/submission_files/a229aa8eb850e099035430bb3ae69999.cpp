#include<bits/stdc++.h>
#define f first
#define s second
#define mp make_pair
using namespace std;

int tc,n,a,b,c;
pair<pair<int,int>,int>arr[500005];

int main()
{
	scanf("%d",&tc);
	while(tc--)
	{
		int ans = 0;
		
		scanf("%d",&n);
		for(int x = 1 ; x <= n ; x++)
		{
			scanf("%d %d",&a,&b);
			
			if(a == b) assert(false);
			if(a > b) 
			{
				swap(a,b);
				c = 0;
			}
			else c = 1;
			// a lebih kecil
			arr[x] = mp(mp(a,b),c);
		}
		
		sort(arr + 1 , arr + n + 1);
		
		
		int now = 1;
		int nyak = 1;
		for(int x = 2; x <= n ; x++)
		{
			if(arr[x].f.f == arr[now].f.f && arr[x].f.s == arr[now].f.s 
			&& arr[x].s == arr[now].s)
			{
				nyak++;
			}
			else if(arr[x].f.f == arr[now].f.f && arr[x].f.s == arr[now].f.s 
			&& arr[x].s != arr[now].s)
			{
				ans = ans + nyak;
				ans++;
				nyak = 0;
			}
			else
			{
				now = x;
				nyak = 1;
			}
		}
		printf("%d\n",ans);
	}
}
