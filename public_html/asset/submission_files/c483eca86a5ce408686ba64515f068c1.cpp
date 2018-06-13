#include<bits/stdc++.h>
#define f first
#define s second
#define mp make_pair
#define pb push_back
using namespace std;
 
typedef long long ll;
ll arr[105][105];
int tc,r,s,d,n,a,b,c;
 
int main()
{
	cin >> tc;
	while(tc--)
	{
		memset(arr,-1,sizeof arr);
		cin >> r >> s >> d >> n;
		for(int x = 1 ; x <= 100 ; x++) arr[x][x] = 0;
		
		for(int x = 1 ; x <= r ; x++)
		{
			scanf("%d %d %d",&a,&b,&c);
			arr[a][b] = c;
			arr[b][a] = c;
		}
		
		
		for(int x = 1; x <= 100 ; x++)
		{
			for(int y = 1; y <= 100; y++)
			{
				for(int z = 1 ; z <= 100 ;z++)
				{
					if(arr[y][x] != -1 && arr[x][z] != -1 && (arr[y][x] + arr[x][z] < arr[y][z] || arr[y][z] == -1))
					{
						arr[y][z] = arr[y][x] + arr[x][z];
					}
				}
			}
		}
		
		
		if(arr[s][d] <= n && arr[s][d] != -1) printf("%d\n",arr[s][d]);
		else printf("Andi tidak bisa mengikuti seminar.\n");
	}
}
