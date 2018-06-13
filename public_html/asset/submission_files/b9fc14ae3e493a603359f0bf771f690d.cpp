#include<bits/stdc++.h> 
using namespace std;

int tc,n,m,nyak[1000005],a,b;
int arr[1000005];

int main()
{
	scanf("%d",&tc);
	while(tc--)
	{
		memset(arr,0,sizeof arr);memset(nyak,0,sizeof nyak);
		
		scanf("%d %d",&n,&m);
		for(int x = 1; x <= n ; x++)
		{
			scanf("%d",&arr[x]);
			nyak[arr[x]] ++;
		}
		sort(arr+1,arr+n+1);
		
		bool flag = false;
		for(int x = 1; x <= n ; x++)
		{
			//printf("haaa %d %d %d\n",arr[x],m-arr[x],nyak[m - arr[x]]);
			if(arr[x] > m - arr[x]) break;
			if((arr[x] == m - arr[x] && nyak[arr[x]] >= 2))
			{
				a = arr[x];
				b = m - arr[x];
				flag = true;
			}
			else if(arr[x] == m - arr[x]) continue;
			if(nyak[m - arr[x]] == 1 )
			{
				a = arr[x];
				b = m - arr[x];
				flag = true;
			}
		}
		
		if(flag) printf("%d %d\n",a,b);
		else printf("Billy rapopo\n");
	}
}
